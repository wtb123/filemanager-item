<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property int $userId
 * @property int $size
 * @property int $time
 * @property string $path
 * @property string $name;
 *
 * @property User $user
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'],'file','skipOnEmpty'=>false ,'message'=>'请选择上传文件','on'=>'upload'],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['name'],'string','on'=>'update'],
        ];
    }

    /**
     * 修改文件名的时候，不需要验证 'file'
     * @return array
     */
    public function scenarios()
    {

        return
        [
            'upload'=>['file'],
            'update'=>['name'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'name'=>'文件名',
            'size' => '文件大小',
            'time' => '上传时间',
            'path' => '存储路径',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
      /*
        * 存储文件
        * */
    public function upload()
    {
        if($this->validate())
        {
            if(false===($Dir=$this->getDir())) return false;
            $saveName=date('YmHis').'_'.rand(100,999).'.'.$this->file->extension;
            $this->name=$this->file->name;
            $this->time=time();
            $this->size=$this->file->size;
            $this->userId=Yii::$app->user->identity->id;
            $this->path=$Dir.$saveName;
            $this->save(false);
            $filePath=Yii::getAlias('@frontend').'/web/'.$Dir.$saveName;
            $this->file->saveAs($filePath);
            return true;
        }
    }

    /*
     * 获取文件存储路径
     * */
    public function getDir()
    {
        $Dir='upload/'.date('Ym').'/';
        if(!file_exists(Yii::getAlias('@frontend').'/web/'.$Dir))
        {
            if(mkdir(Yii::getAlias('@frontend').'/web/'.$Dir,0777,true)===false)
                return false;
        }
        return $Dir;
    }
}
