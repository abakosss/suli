namespace _1022_feladat2;

class Program
{
    static void Main(string[] args)
    {
        menupont();
    }

    static void menupont()
    {
        Console.WriteLine("1. Első menüpont\n" +
                          "2. Második menüpont\n" +
                          "3. Harmadik menüpont\n" +
                          "4. Negyedik menüpont\n" +
                          "5. Kilépés");
        int menupont = int.Parse(Console.ReadLine());

        switch (menupont)
        {
            case 1: Console.WriteLine("Első menüpont");
                break;
            case 2: Console.WriteLine("Második menüpont");
                break;
            case 3: Console.WriteLine("Harmadik menüpont");
                break;
            case 4: Console.WriteLine("Negyedik menüpont");
                break;
            case 5: Console.WriteLine("Kilépés");
                break;
            default: Console.WriteLine("Rossz választás.");
                break;
        }
    }
}
