<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $project_id
 * @property string $name
 * @property string|null $description
 * @property string $status
 * @property string $priority
 * @property string|null $due_date
 * @property int|null $assigned_to
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $assignedTo
 * @property Projects $project
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'name', 'status', 'priority'], 'required'],
            [['project_id', 'assigned_to'], 'integer'],
            [['description', 'status', 'priority'], 'string'],
            [['due_date', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projects::class, 'targetAttribute' => ['project_id' => 'id']],
            [['assigned_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['assigned_to' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'priority' => 'Priority',
            'due_date' => 'Due Date',
            'assigned_to' => 'Assigned To',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[AssignedTo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedTo()
    {
        return $this->hasOne(User::class, ['id' => 'assigned_to']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Projects::class, ['id' => 'project_id']);
    }
}
