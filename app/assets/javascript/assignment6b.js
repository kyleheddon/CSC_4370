function getHoursFromUser(){
	var hours = prompt('Enter your hours for the week');

	if(hours == '-1')
		return null;

	return parseInt(hours);
}

function calculatePay(hours){
	var rate = 15;
	var pay;
	if(hours > 40){
		pay = 40 * rate + (hours-40) * 1.5 * rate;
	} else {
		pay = hours * rate;
	}
	return pay;
}

function addEmployeeRowToReport(number, hours, pay){
	var tableBody = document.getElementById('employee_wages').getElementsByTagName('tbody')[0];
	var row = createRowFromTemplate();

	if(number % 2 == 0)
		row.classList.add('even');

	fillInColumns(row.children, number, hours, pay);
	tableBody.appendChild(row);
}

function createRowFromTemplate(){
	var template = document.getElementById('employee_wage_template');
	var row = document.createElement('tr');
	row.innerHTML = template.innerHTML;
	return row;
}

function fillInColumns(columns, number, hours, pay){
	columns[0].innerHTML = number;
	columns[1].innerHTML = hours;
	columns[2].innerHTML = '$' + pay;
}

function updateTotal(total){
	document.getElementById('total').innerHTML = '$' + total;
}

var hours,
		pay,
		number = 1,
		total = 0;

while(hours = getHoursFromUser()){
	pay = calculatePay(hours);
	addEmployeeRowToReport(number++, hours, pay);
	updateTotal(total += pay);
}
