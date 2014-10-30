var GUESS_LIMIT = 5;
var secretNumber;
var numberOfGuesses;

function startNewGame(){
	secretNumber = Math.ceil(Math.random() * 100);
	resetNumberOfGuesses();
	resetInput();
}

function resetNumberOfGuesses(){
	numberOfGuesses = 0;
	showNumberOfGuesses();
}

function resetInput(){
	var input = document.getElementById('guess');
	input.value = '';
	input.focus();
}

function showNumberOfGuesses(){
	document.getElementById('number_guesses').innerHTML = numberOfGuesses + ' of ' + GUESS_LIMIT + ' tries';
}

function whenUserSubmitsNumber(callback){
	document.getElementById('guess_form').addEventListener('submit', function(event){
		event.preventDefault();
		var number = document.getElementById('guess').value;
		number = parseInt(number);
		callback(number);
	});
}

function showMessage(message){
	var element = document.getElementById('message');
	element.innerHTML = message;
}

function correctGuess(){
	showMessage('Correct!!! You did it in ' + numberOfGuesses + ' ' + pluralizeTries(numberOfGuesses) + '. Now guess the new secret number!');
	startNewGame();
}

function pluralizeTries(number){
	return number == 1 ? 'try' : 'tries';
}

function incorrectGuess(message){
	if(numberOfGuesses == GUESS_LIMIT){
		showMessage(message + '. You\'ve reached the maximum number of tries. You lose. Now guess the new secret number!');
		startNewGame();
	} else {
		showMessage(message);
	}
}

function incrementGuesses(){
	numberOfGuesses++
	showNumberOfGuesses();
}

startNewGame();

whenUserSubmitsNumber(function(number){
	incrementGuesses();

	if(number == secretNumber){
		correctGuess()
	} else if(number > secretNumber) {
		incorrectGuess('Too High');
	} else {
		incorrectGuess('Too Low');
	}
});
