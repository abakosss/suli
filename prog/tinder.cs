namespace _1022_feladat3;

class Szemely
{
    public string Nev { get; set; }
    public int? Magassag { get; set; }
    public int? Kor { get; set; }
    
    public Szemely(string nev, int? magassag = null, int? kor = null)
    {
        Nev = nev;
        Magassag = magassag;
        Kor = kor;
    }
    
    public static bool Osszeillik(Szemely szemely1, Szemely szemely2)
    {
        if (szemely1.Magassag.HasValue && szemely2.Magassag.HasValue && szemely1.Kor.HasValue && szemely2.Kor.HasValue)
        {
            return Math.Abs(szemely1.Magassag.Value - szemely2.Magassag.Value) < 10 && 
                   Math.Abs(szemely1.Kor.Value - szemely2.Kor.Value) < 5;
        }
        else if (szemely1.Nev == szemely2.Nev)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

class Program
{
    static void Main(string[] args)
    {
        Console.Write("Add meg az első személy nevét: ");
        string nev1 = Console.ReadLine();
        Console.Write("Add meg az első személy magasságát (cm-ben, opcionális): ");
        int? magassag1 = null;
        if (int.TryParse(Console.ReadLine(), out int mag1))
        {
            magassag1 = mag1;
        }
        Console.Write("Add meg az első személy korát (opcionális): ");
        int? kor1 = null;
        if (int.TryParse(Console.ReadLine(), out int korVal1))
        {
            kor1 = korVal1;
        }

        Szemely szemely1 = new Szemely(nev1, magassag1, kor1);
        
        Console.Write("Add meg a második személy nevét: ");
        string nev2 = Console.ReadLine();
        Console.Write("Add meg a második személy magasságát (cm-ben, opcionális): ");
        int? magassag2 = null;
        if (int.TryParse(Console.ReadLine(), out int mag2))
        {
            magassag2 = mag2;
        }
        Console.Write("Add meg a második személy korát (opcionális): ");
        int? kor2 = null;
        if (int.TryParse(Console.ReadLine(), out int korVal2))
        {
            kor2 = korVal2;
        }

        Szemely szemely2 = new Szemely(nev2, magassag2, kor2);
        
        if (Szemely.Osszeillik(szemely1, szemely2))
        {
            Console.WriteLine("A két személy összeillik.");
        }
        else
        {
            Console.WriteLine("A két személy nem illik össze.");
        }
    }
}