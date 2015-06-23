class Question < ActiveRecord::Base
	belongs_to :survey
	has_many :answers, :dependent => :destroy
	accepts_nested_attributes_for :answers, :reject_if => lambda { |a| a[:answer].blank? }, :allow_destroy => true

	def self.getQuestionsForSurvey(id)
		return Question.where(survey_id: id)
	end

end
