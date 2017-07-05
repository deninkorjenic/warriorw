<div class="row quiz" data-id="{{ $quiz->id }}">
  <div class="col s12 m8">
    <p>{{ $quiz->question }}</p>
  </div>
  <div class="col s12 m4">
    <div class="row">
      <div class="input-field col s12">
        <select 
          name="quiz-answer" 
          id="answer-{{ $quiz->id }}" 
          required>
          @if($quiz->completed)
            disabled
            <option value="{{ $quiz->correct_answer }}">{{ $quiz->correct_answer}}</option>
          @else
            @foreach($quiz->answers as $answer)
              <option value="{{ $answer }}">{{ $answer }}</option>
            @endforeach
          @endif
        </select>
        <label for="answer-{{ $quiz->id }}">Pick your answer</label>
      </div>              
    </div>
  </div>
</div>