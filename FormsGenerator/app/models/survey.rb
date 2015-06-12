class Survey < ActiveRecord::Base
	has_many :questions
	belongs_to :creator, :class_name => 'Person', :foreign_key => 'creator_id'
end
