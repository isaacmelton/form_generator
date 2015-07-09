class AddPersonRefToSurveys < ActiveRecord::Migration
  def change
    add_reference :surveys, :person, index: true, foreign_key: true
  end
end
