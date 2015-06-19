class RecordedAnswersController < ApplicationController
  before_action :set_recorded_answer, only: [:show, :edit, :update, :destroy]

  # GET /recorded_answers
  # GET /recorded_answers.json
  def index
    @recorded_answers = RecordedAnswer.all
  end

  # GET /recorded_answers/1
  # GET /recorded_answers/1.json
  def show
  end

  # GET /recorded_answers/new
  def new
    @recorded_answer = RecordedAnswer.new
  end

  # GET /recorded_answers/1/edit
  def edit
  end

  # POST /recorded_answers
  # POST /recorded_answers.json
  def create
    @recorded_answer = RecordedAnswer.new(recorded_answer_params)

    respond_to do |format|
      if @recorded_answer.save
        format.html { redirect_to @recorded_answer, notice: 'Recorded answer was successfully created.' }
        format.json { render :show, status: :created, location: @recorded_answer }
      else
        format.html { render :new }
        format.json { render json: @recorded_answer.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /recorded_answers/1
  # PATCH/PUT /recorded_answers/1.json
  def update
    respond_to do |format|
      if @recorded_answer.update(recorded_answer_params)
        format.html { redirect_to @recorded_answer, notice: 'Recorded answer was successfully updated.' }
        format.json { render :show, status: :ok, location: @recorded_answer }
      else
        format.html { render :edit }
        format.json { render json: @recorded_answer.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /recorded_answers/1
  # DELETE /recorded_answers/1.json
  def destroy
    @recorded_answer.destroy
    respond_to do |format|
      format.html { redirect_to recorded_answers_url, notice: 'Recorded answer was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_recorded_answer
      @recorded_answer = RecordedAnswer.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def recorded_answer_params
      params.require(:recorded_answer).permit(:user_id, :answer_id, :survey_id)
    end
end
