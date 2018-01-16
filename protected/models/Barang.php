<?php

/**
 * This is the model class for table "t_barang".
 *
 * The followings are the available columns in table 't_barang':
 * @property integer $id
 * @property string $nama
 * @property string $rincian
 * @property string $satuan
 * @property integer $min_stok
 * @property string $tanggal_stok
 */
class Barang extends CActiveRecord
{
    public $tanggal_stok;
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Barang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, rincian, satuan, min_stok', 'required'),
			array('min_stok', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>100),
			array('rincian', 'length', 'max'=>150),
			array('satuan', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, rincian, satuan, min_stok, tanggal_stok', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'rincian' => 'Rincian',
			'satuan' => 'Satuan',
			'min_stok' => 'Stok Minimum',
                        'tanggal_stok'=>'Tanggal'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->order = 'nama ASC';

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('rincian',$this->rincian,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('min_stok',$this->min_stok);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function saldo()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->order = 'nama ASC';

		$criteria->compare('id',$this->id);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('rincian',$this->rincian,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('min_stok',$this->min_stok);
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getList() {
            $criteria = new CDbCriteria;
            $criteria->order = 'nama';
            $model = Barang::model()->findAll($criteria);
            $listData = CHtml::listData($model, 'id', 'nama');
            return $listData;
        }
        
        public function report($tanggal) {
                $sql = "SELECT id, nama, rincian, satuan, min_stok, (SUM(masuk)-SUM(keluar)) AS stok
                    FROM
                    (
                    SELECT a.id, a.nama, a.rincian, a.satuan, a.min_stok, (SELECT IFNULL(sum(b.jumlah), 0)) AS masuk, 0 AS keluar FROM t_barang a LEFT JOIN t_transaksi_masuk b ON a.id=b.barang_id WHERE (b.tanggal BETWEEN '0000-00-00' AND '$tanggal') GROUP BY a.id
                    UNION
                    SELECT a.id, a.nama, a.rincian, a.satuan, a.min_stok, 0 AS masuk, (SELECT IFNULL(sum(c.jumlah), 0)) AS keluar FROM t_barang a LEFT JOIN t_transaksi_keluar c ON a.id=c.barang_id WHERE (c.tanggal BETWEEN '0000-00-00' AND '$tanggal') GROUP BY a.id
                    )
                    as t1
                    GROUP BY id
                    ORDER BY nama
                    ";
                $command = Yii::app()->db->createCommand($sql);
                $rows = $command->queryAll(true);
                return $rows;
        }
}