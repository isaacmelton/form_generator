class Survey < ActiveRecord::Base
	has_many :forms
	has_many :persons
	belongs_to :creator, :class_name => 'Person', :foreign_key => 'creator_id'
end
