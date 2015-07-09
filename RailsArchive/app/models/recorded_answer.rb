class RecordedAnswer < ActiveRecord::Base

  def self.getVotesPerAnswer()
    array = Array.new
    tmphsh = Hash.new
    result = RecordedAnswer.connection.select_all("SELECT answers.question_id AS question_id,
                                                       answers.answer, COUNT(answer_id) AS choice_count,
                                                       tottable.total AS total
                                                   FROM recorded_answers
                                                   INNER JOIN answers
                                                   ON answer_id = answers.id
                                                   LEFT JOIN (SELECT answers.question_id AS question_id,
                                                                     COUNT(answer_id) AS total
                                                              FROM recorded_answers
                                                              INNER JOIN answers
                                                              ON answer_id = answers.id
                                                              GROUP BY answers.question_id) AS tottable
                                                   ON answers.question_id = tottable.question_id
                                                   GROUP BY answer_id, answers.question_id")
    array = result.each do |row|
      row.each do |k, x|
        if tmphsh.count < 5
          tmphsh[k] = x
        else
          tmphsh[k] = x
          tmphsh = Hash.new
        end
      end
    end
    return array
  end

end
