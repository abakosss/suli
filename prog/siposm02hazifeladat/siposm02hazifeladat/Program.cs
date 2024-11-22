namespace siposm02hazifeladat;

class Program
{
    static void Main(string[] args)
    {
        Szuperhos();
    }

    static void Szuperhos()
    {
        Console.WriteLine("Adj meg egy szuperhős nevet!");
        string szuperhosNev = Console.ReadLine();
        int vasemberMegsemmisitettIdegenTamadokDb = 10;
        int hulkMegsemmisitettIdegenTamadokDb = 10;
        double vasemberBirtokoltVibranium = 10;
        double hulkGammasugarzas = 10;
        if (szuperhosNev == "Vasember")
        {
            Console.WriteLine($"Add meg {szuperhosNev} civil nevét!");
            string vasemberCivilNev = Console.ReadLine();
            Console.WriteLine($"Add meg {szuperhosNev} vagyonának összegét!");
            int vasemberVagyon = int.Parse(Console.ReadLine());
            Console.WriteLine($"Add meg {szuperhosNev} megsemmisített idegen támadók darabszámát!");
            vasemberMegsemmisitettIdegenTamadokDb = int.Parse(Console.ReadLine());
            Console.WriteLine($"Add meg {szuperhosNev} vaspáncélok számát!");
            int vasemberVaspancelokSzam = int.Parse(Console.ReadLine());
            Console.WriteLine($"Add meg {szuperhosNev} birtokolt vibránium mennyiségét!");
            vasemberBirtokoltVibranium = double.Parse(Console.ReadLine());
        }
        else if (szuperhosNev == "Hulk")
        {
            Console.WriteLine($"Add meg {szuperhosNev} civil nevét!");
            string hulkCivilNev = Console.ReadLine();
            Console.WriteLine($"Add meg {szuperhosNev} megsemmisített idegen támadók darabszámát!");
            hulkMegsemmisitettIdegenTamadokDb = int.Parse(Console.ReadLine());
            Console.WriteLine($"Add meg {szuperhosNev} egy szuperképesség megnevezését!");
            string hulkSzuperkepesseg = Console.ReadLine();
            Console.WriteLine($"Add meg {szuperhosNev} gammasugárzés mértékét!");
            hulkGammasugarzas = double.Parse(Console.ReadLine());
        }
        else
        {
            Console.WriteLine("Itt a program véget ér.");
            while (Console.ReadLine() != "x")
            {
                Console.Clear();
            }
        }

        bool vasemberAJobb = false;
        if (vasemberMegsemmisitettIdegenTamadokDb > hulkMegsemmisitettIdegenTamadokDb)
        {
            Console.WriteLine("Vasember > Hulk");
        }
        else if (vasemberBirtokoltVibranium > hulkGammasugarzas)
        {
            vasemberAJobb = true;
        }
        else
        {
            vasemberAJobb = false;
        }
        
        if (vasemberAJobb == true)
        {
            Console.WriteLine("igaz");
        }
        else
        {
            Console.WriteLine("hamis");
        }
    }
}