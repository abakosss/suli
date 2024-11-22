namespace szigetek;

class Program
{
    static void Main(string[] args)
    {
        int[] meresek = Meresek();
        MeresekKiiratas(meresek);
        (int max, int legmagasabbPontMagassaga) = MeresekLegmagasabbPont(meresek);
        Console.WriteLine($"Legmagasabb pont indexe: {max}.\n Legmagasabb pont értéke: {legmagasabbPontMagassaga} ");
        Console.WriteLine($"Hányszor fordul elő a legmagasabb pont? {LegmagasabbPontHanyszorFordultElo(meresek, legmagasabbPontMagassaga)}");
        (int leghosszabbSzigetszakasHossza, int leghosszabbSzigetszakasKezdoIndex, int leghosszabbSzigetszakasZaroIndex) = LeghosszabbSzigetszakaszHossza(meresek);
        Console.WriteLine($"Leghosszabb sziget hossza: {leghosszabbSzigetszakasHossza}");
        Console.WriteLine($"kezdoindex: {leghosszabbSzigetszakasKezdoIndex}, zaroindex: {leghosszabbSzigetszakasZaroIndex}");
        Console.WriteLine($"Rajta van-e a leghosszabb szigetszakason a legmagasabb pont értéke? {LeghosszabbSzigetSzakaszonTalalhatoEAzElsoMaximalisMagassaguMeresiPont(meresek, leghosszabbSzigetszakasHossza, max, leghosszabbSzigetszakasKezdoIndex, leghosszabbSzigetszakasZaroIndex)}");
    }

    static int[] Meresek()
    {
        int[] meresek = new int[10];
        Random rnd = new Random();

        for (int i = 0; i < meresek.Length; i++)
        {
            int esely = rnd.Next(0, 100);
            if (esely <= 40)
            {
                meresek[i] = rnd.Next(1, 11);
            }
            else
            {
                meresek[i] = 0;
            }
        }
        
        return meresek;
    }

    static void MeresekKiiratas(int[] meresek)
    {
        for (int i = 0; i < meresek.Length; i++)
        {
            Console.WriteLine($"{i}. mérés: {meresek[i]}");
        }
    }

    static (int max, int legmagasabbPontMagassaga) MeresekLegmagasabbPont(int[] meresek)
    {
        int max = 1;
        int legmagasabbPontMagassaga = 0;
        for (int i = 2; i < meresek.Length; i++)
        {
            if (meresek[i] > meresek[max])
            {
                max = i;
            }

            legmagasabbPontMagassaga = meresek[max];
        }
        return (max, legmagasabbPontMagassaga);
    }

    static int LegmagasabbPontHanyszorFordultElo(int[] meresek, int legmagasabbPontMagassaga)
    {
        int db = 0;
        for (int i = 0; i < meresek.Length; i++)
        {
            if (legmagasabbPontMagassaga == meresek[i])
            {
                db++;
            }
        }

        return db;
    }

    static (int, int, int) LeghosszabbSzigetszakaszHossza(int[] meresek)
    {
        int leghosszabbSzigetszakasz = 0;
        int szigetszakaszHossz = 0;
        int szigetszakaszKezdete = -1;
        int leghosszabbSzigetszakasKezdoIndex = -1;
        int leghosszabbSzigetszakasZaroIndex = -1;
        
        for (int i = 0; i < meresek.Length; i++)
        {
            if (meresek[i] != 0)
            {
                if (szigetszakaszHossz == 0)
                {
                    szigetszakaszKezdete = i;
                }
                szigetszakaszHossz++;
            }
            else
            {
                if (szigetszakaszHossz > leghosszabbSzigetszakasz)
                {
                    leghosszabbSzigetszakasz = szigetszakaszHossz;
                    leghosszabbSzigetszakasKezdoIndex = szigetszakaszKezdete;
                    leghosszabbSzigetszakasZaroIndex = i - 1;
                }
                szigetszakaszHossz = 0;
            }
        }
        
        if (szigetszakaszHossz > leghosszabbSzigetszakasz)
        {
            leghosszabbSzigetszakasz = szigetszakaszHossz;
            leghosszabbSzigetszakasKezdoIndex = szigetszakaszKezdete;
            leghosszabbSzigetszakasZaroIndex = meresek.Length - 1;
        }

        return (leghosszabbSzigetszakasz, leghosszabbSzigetszakasKezdoIndex, leghosszabbSzigetszakasZaroIndex);
    }

    static bool LeghosszabbSzigetSzakaszonTalalhatoEAzElsoMaximalisMagassaguMeresiPont(int[] meresek, int leghosszabbSzigetszakaszHossza, int max, int leghosszabbSzigetszakasKezdoIndex, int leghosszabbSzigetszakasZaroIndex)
    {
        if (max >= leghosszabbSzigetszakasKezdoIndex && max <= leghosszabbSzigetszakasZaroIndex)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}