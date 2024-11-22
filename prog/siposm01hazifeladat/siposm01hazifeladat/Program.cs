namespace siposm01hazifeladat;

class Program
{
    static void Main(string[] args)
    {
        double celsius = CelsiusFokBekeres();
        double fahrenheit = CelsiusAtvaltasFahrenheitbe(celsius);
        Console.WriteLine($"Celsius = {celsius}");
        Console.WriteLine($"Fahrenheit: {fahrenheit}");
        double korSugar = KorSugarBekeres();
        double korKerulet = KorKeruletKiszamitas(korSugar);
        Console.WriteLine($"A körnek a kerülete = {korKerulet}");
        Formazo();
    }

    //1. Celsius-Fahrenheit átváltó program
    static double CelsiusFokBekeres()
    {
        Console.WriteLine("Adj megy egy celsius fokot.");
        double celsius = int.Parse(Console.ReadLine());

        return celsius;
    }

    static double CelsiusAtvaltasFahrenheitbe(double celsius)
    {
        double fahrenheit = celsius * 9 / 5 + 32;
        return fahrenheit;
    }

    //2. Kör kerület kiszámító
    static double KorSugarBekeres()
    {
        Console.WriteLine("Add meg a kör sugarát!");
        double sugar = double.Parse(Console.ReadLine());

        return sugar;
    }

    static double KorKeruletKiszamitas(double korSugar)
    {
        double korKerulet = 2 * Math.PI * korSugar;
        return korKerulet;
    }
    
    //3. Formázó

    static void Formazo()
    {
        Console.WriteLine("Add meg a neved: ");
        string nev = Console.ReadLine();
        Console.WriteLine("Add meg az életkorod: ");
        int eletkor = int.Parse(Console.ReadLine());
        string nem = "";
        while (nem is not ("férfi" or "nő"))
        {
            Console.WriteLine("Add meg a nemed: ");
            nem = Console.ReadLine();
        }
        Console.WriteLine("Add meg mikor kezdted az egyetemet: ");
        int egyetemKezdeseviEv = int.Parse(Console.ReadLine());

        Console.WriteLine($"Kedves {nev}! \nTe {egyetemKezdeseviEv}-ben kezdted az egyetemet, \n\t {nem} nemű vagy \n\t\t és {eletkor} éves!");
    }
}
