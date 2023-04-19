function generateBill() {
	// Get input values
	var ticketClass = document.getElementById("ticket-class").value;
	var ticketQuantity = document.getElementById("ticket-quantity").value;
	
	// Define ticket prices and GST rate
	var ticketPrices = {
		"gold": 150,
		"premium": 200
	};
	var gstRate = 0.18;
	
	// Calculate total price
	var totalPrice = ticketPrices[ticketClass] * ticketQuantity;
	var gstAmount = totalPrice * gstRate;
	var grandTotal = totalPrice + gstAmount;
	
	// Generate bill HTML
	var billHTML = "<h2>Bill</h2>";
	billHTML += "<p>Ticket Class: " + ticketClass + "</p>";
	billHTML += "<p>Quantity: " + ticketQuantity + "</p>";
	billHTML += "<p>Price per ticket: " + ticketPrices[ticketClass] + "</p>";
	billHTML += "<p>Total Price: " + totalPrice.toFixed(2) + "</p>";
	billHTML += "<p>GST (" + (gstRate * 100) + "%): " + gstAmount.toFixed(2) + "</p>";
	billHTML += "<h3>Grand Total: " + grandTotal.toFixed(2) + "</h3>";

	
	// Display bill
	document.getElementById("bill").innerHTML = billHTML;
	let res=billHTML.fontcolor("white");
	document.getElementById("bill").innerHTML =res;
}
