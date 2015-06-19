json.array!(@records) do |record|
  json.extract! record, :id, :user_id, :answer_id, :survey_id
  json.url record_url(record, format: :json)
end
