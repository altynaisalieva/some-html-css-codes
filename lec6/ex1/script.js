var value;
document.writeln("<table>");
document.writeln("<caption> Random Numbers</caption><tr>");

for(var i=1; i<=20; i++)
{
    value = Math.floor(1+Math.random()*6);
    document.writeln("<td>" + value + "</td>");

    if(i%5==0 && i !=20)
        document.writeln("</tr><tr>");
}
document.writeln("</tr></table>");