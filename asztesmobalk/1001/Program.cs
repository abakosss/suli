using System.Collections.Specialized;
using System.Security.Claims;

namespace _1001;

class Dolgozo
{
    private string nev;
    private double fizetes;

    //konstruktor létrehozása

    public Dolgozo()
    {
        nev = "Névtelen";
        fizetes = 0;
    }

    public Dolgozo(string nev, double fizetes)
    {
        this.nev = nev;
        this.fizetes = fizetes;
    }

    public void Beallit_fizetes(double fizu)
    {
        fizetes = fizu;
    }

    public void Beallit_nev(string nev_)
    {
        nev = nev_;
    }

    public string Vissza_nev()
    {
        return nev;
    }

    public double Vissza_fizu()
    {
        return fizetes;
    }

    public void Emelt_fizu()
    {
        Console.WriteLine("Add meg, hogy mennyivel legyen emelve a fizetés!");
        int fizetesemeles = int.Parse(Console.ReadLine());
        fizetes += fizetesemeles;
    }
}

class Program
{


    static void Main(string[] args)
    {
        List<Dolgozo> adat = new List<Dolgozo>();
        int db = 0;
        string neve = "";
        double fiz = 0;

        Console.WriteLine("Hány db dolgozó adatot szeretnél rögzíteni?");
        db = int.Parse(Console.ReadLine());
        for (int i = 0; i < db; i++)
        {
            Console.WriteLine($"Kérem a {i + 1}. nevet: ");
            neve = Console.ReadLine();
            Console.WriteLine($"Kérem a {i + 1}. fizetését: ");
            fiz = double.Parse(Console.ReadLine());
            adat.Add(new Dolgozo(neve, fiz));
        }

        foreach (var kiir in adat)
        {
            Console.WriteLine($"Név: {kiir.Vissza_nev()}, Fizetés: {kiir.Vissza_fizu()}");
        }

        // Dolgozo adat1 = new Dolgozo();
        // adat1.Beallit_nev("Kiss Imre");
        // adat1.Beallit_fizetes(50000);
        // Console.WriteLine($"A(z){adat1.Vissza_nev()} fizetése:{adat1.Vissza_fizu()}");
        // adat1.Emelt_fizu();
        // Console.WriteLine($"A(z){adat1.Vissza_nev()} emelt fizetése:{adat1.Vissza_fizu()}");

        // Dolgozo adat2 = new Dolgozo();
        // Console.WriteLine($"A(z){adat2.Vissza_nev()} fizetése:{adat2.Vissza_fizu()}");

        Console.WriteLine("Szeretnéd megváltoztatni valamelyik fizetést? Y/N");
        string valasz = Console.ReadLine();
        if (valasz == "Y")
        {
            bool sikerult = false;
            while (!sikerult)
            {
                Console.WriteLine("Kinek szeretnéd megváltoztatni? Nevét írd be.");
                string beirtnev = Console.ReadLine();
                if (beirtnev == neve)
                {
                    sikerult = true;
                    for (int i = 0; i < db; i++)
                    {
                        if (adat[i].Vissza_nev() == beirtnev)
                        {
                            //Console.WriteLine(adat[i].Vissza_nev());
                            adat[i].Emelt_fizu();
                            Console.WriteLine($"Név: {adat[i].Vissza_nev()}, új fizetés: {adat[i].Vissza_fizu()}");
                        }
                    }
                }
            }

        }
        else if (valasz == "N")
        {
            Console.WriteLine("oke szia");
        }
        else
        {
            Console.WriteLine("oke");
        }
    }


}
