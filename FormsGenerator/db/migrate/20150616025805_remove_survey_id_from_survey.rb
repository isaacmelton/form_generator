class RemoveSurveyIdFromSurvey < ActiveRecord::Migration
  def change
    remove_column :surveys, :survey_id, :int
  end
end
