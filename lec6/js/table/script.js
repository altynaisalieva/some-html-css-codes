var amount;
var principal = 1000.00;
var rate = 0.05;

document.writeln("<table>");
document.writeln("<caption> Calculating Compound Interest</caption>");
document.writeln("<thead><tr><th>Year</th>");
document.writeln("<th> Amount on deposite</th>");
document.writeln("</tr></thead><tbody>");

for(var year = 1; year<=10; ++year)
{
    amount = principal * Math.pow(1.0+rate, year); //Math.pow(x,y)

    if(year % 2 !==0)
    
        document.writeln("<tr class='oddrow'><td>" + year + "</td><td>" + amount.toFixed(2) + "</td><tr>");

    else
        document.writeln("<tr><td>" + year + "</td><td>" + amount.toFixed(2) + "</td></tr>");

}

document.writeln("</tbody></table>");
