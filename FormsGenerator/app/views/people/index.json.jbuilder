json.array!(@people) do |person|
  json.extract! person, :id, :first_name, :last_name, :email, :city, :state, :country, :sex
  json.url person_url(person, format: :json)
end
