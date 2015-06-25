class SurveysController < ApplicationController
  before_action :set_survey, only: [:show, :edit, :update, :destroy]

  # GET /surveys
  # GET /surveys.json
  def index
    @surveys = Survey.all    
  end

  # GET /surveys/1
  # GET /surveys/1.json
  def show
  end

  # GET /surveys/new
  def new
    @survey = Survey.new
    3.times do
      question = @survey.questions.build
      4.times { question.answers.build }
    end
  end

  # GET /surveys/1/edit
  def edit
  end

  def submit_form
    @survey = Survey.find(params[:id])
    # FIXME get the question and answer ids and set them.
    @survey.questions.each do |q|
      @question = Question.where(q.id)
      if params[q.id].nil?
        @answer = Answer.new
      else
        @answer = Answer.question_id.where(params[q.id])
      end
    end
    # @survey.question.answer <---
    # ^ This will be a foreach type of implementation
    # Save the survey and pass it to the next page
    @survey.save
    # FIXME next iteration -> This should not be saved to @survey, 
    # but to @user or user related table,
    # since the answers are user specific
  end

  # POST /surveys
  # POST /surveys.json
  def create
    @survey = Survey.new(survey_params)

    respond_to do |format|
      if @survey.save
        format.html { redirect_to @survey, notice: 'Survey was successfully created.' }
        format.json { render :show, status: :created, location: @survey }
      else
        format.html { render :new }
        format.json { render json: @survey.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /surveys/1
  # PATCH/PUT /surveys/1.json
  def update
    respond_to do |format|
      if @survey.update(survey_params)
        format.html { redirect_to @survey, notice: 'Survey was successfully updated.' }
        format.json { render :show, status: :ok, location: @survey }
      else
        format.html { render :edit }
        format.json { render json: @survey.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /surveys/1
  # DELETE /surveys/1.json
  def destroy
    @survey.destroy
    respond_to do |format|
      format.html { redirect_to surveys_url, notice: 'Survey was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_survey
      @survey = Survey.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def survey_params
      params.require(:survey).permit(:title, :person_id, questions_attributes: [:id, :question, :survey_id, :_destroy, answers_attributes: [:id, :question_id, :answer, :_destroy]])
      #params.permit(:survey, :survey_id, :title, :person_id, questions_attributes: [:id, :question, :survey_id, :_destroy, answers_attributes: [:id, :question_id, :answer, :_destroy]])
    end
end
