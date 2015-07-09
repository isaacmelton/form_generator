json.array!(@recorded_answers) do |recorded_answer|
  json.extract! recorded_answer, :id, :user_id, :answer_id, :survey_id
  json.url recorded_answer_url(recorded_answer, format: :json)
end
