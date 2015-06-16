class Survey < ActiveRecord::Base
	has_many :questions, :dependent => :destroy
	accepts_nested_attributes_for :questions, :reject_if => lambda { |a| a[:question].blank? }, :allow_destroy => true
	## belongs_to :creator, :class_name => 'Person', :foreign_key => 'creator_id'
end
