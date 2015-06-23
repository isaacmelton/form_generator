class RecordedAnswer < ActiveRecord::Base

  def self.getVotesPerAnswer()
    array = Array.new
    tmphsh = Hash.new
    result = RecordedAnswer.connection.select_all("SELECT answers.question_id AS question_id,
                                                       answers.answer, COUNT(answer_id) AS choice_count
                                                   FROM recorded_answers
                                                   INNER JOIN answers
                                                   ON answer_id = answers.id
                                                   GROUP BY answer_id, question_id")
    array = result.each do |row|
      row.each do |k, x|
        if tmphsh.count < 4
          tmphsh[k] = x
        else
          tmphsh[k] = x
          tmphsh = Hash.new
        end
      end
    end
#    q_id = array[0]["question_id"]
#    t = 0
#    array = array.each do |ary|
#      if q_id == ary["question_id"] then
#        t = t + ary["choice_count"]
#      else
#        q_id = ary["question_id"]
#        ary["total"] = t
#        t = ary["choice_count"]
#      end
#    end
#    array.last["total"] = t
    return array
  end

end
