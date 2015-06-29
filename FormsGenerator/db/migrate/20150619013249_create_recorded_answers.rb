class CreateRecordedAnswers < ActiveRecord::Migration
  def change
    create_table :recorded_answers do |t|
      t.integer :user_id
      t.integer :answer_id
      t.integer :survey_id

      t.timestamps null: false
    end
  end
end
