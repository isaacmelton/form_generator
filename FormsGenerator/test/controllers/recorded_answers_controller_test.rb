require 'test_helper'

class RecordedAnswersControllerTest < ActionController::TestCase
  setup do
    @recorded_answer = recorded_answers(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:recorded_answers)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create recorded_answer" do
    assert_difference('RecordedAnswer.count') do
      post :create, recorded_answer: { answer_id: @recorded_answer.answer_id, survey_id: @recorded_answer.survey_id, user_id: @recorded_answer.user_id }
    end

    assert_redirected_to recorded_answer_path(assigns(:recorded_answer))
  end

  test "should show recorded_answer" do
    get :show, id: @recorded_answer
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @recorded_answer
    assert_response :success
  end

  test "should update recorded_answer" do
    patch :update, id: @recorded_answer, recorded_answer: { answer_id: @recorded_answer.answer_id, survey_id: @recorded_answer.survey_id, user_id: @recorded_answer.user_id }
    assert_redirected_to recorded_answer_path(assigns(:recorded_answer))
  end

  test "should destroy recorded_answer" do
    assert_difference('RecordedAnswer.count', -1) do
      delete :destroy, id: @recorded_answer
    end

    assert_redirected_to recorded_answers_path
  end
end
