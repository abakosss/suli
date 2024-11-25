namespace sejtek;

class Program
{
    static bool[,] palya = new bool[5,5]
    {
        { false, false, false, false, false},
        { false, true, true, false, false},
        { false, true, true, false, false},
        { false, false, false, false, false},
        { false, false, false, false, false},
    };

    static int SzomszedokSzama(int i, int j)
    {
        // Szomszédos sejtek számlálása
        int db = 0;

        // Ellenőrizzük az alsó szomszédot
        if (i + 1 < palya.GetLength(0) && palya[i + 1, j])
        {
            db++;
        }
        // Ellenőrizzük a felső szomszédot
        if (i - 1 >= 0 && palya[i - 1, j])
        {
            db++;
        }
        // Ellenőrizzük a jobb szomszédot
        if (j + 1 < palya.GetLength(1) && palya[i, j + 1])
        {
            db++;
        }
        // Ellenőrizzük a bal szomszédot
        if (j - 1 >= 0 && palya[i, j - 1])
        {
            db++;
        }
        // Ellenőrizzük a bal felső szomszédot
        if (i - 1 >= 0 && j - 1 >= 0 && palya[i - 1, j - 1])
        {
            db++;
        }
        // Ellenőrizzük a jobb felső szomszédot
        if (i - 1 >= 0 && j + 1 < palya.GetLength(1) && palya[i - 1, j + 1])
        {
            db++;
        }
        // Ellenőrizzük a bal alsó szomszédot
        if (i + 1 < palya.GetLength(0) && j - 1 >= 0 && palya[i + 1, j - 1])
        {
            db++;
        }
        // Ellenőrizzük a jobb alsó szomszédot
        if (i + 1 < palya.GetLength(0) && j + 1 < palya.GetLength(1) && palya[i + 1, j + 1])
        {
            db++;
        }

        return db;
    }
    
    static void UjKor()
    {
        bool[,] seged = new bool[palya.GetLength(0), palya.GetLength(1)];
        for (int i = 0; i < palya.GetLength(0); i++)
        {
            for (int j = 0; j < palya.GetLength(1); j++)
            {
                int db = SzomszedokSzama(i, j);
                if (db == 2 || db == 3)
                {
                    seged[i, j] = true;
                }

                if (db < 2 || db > 3)
                {
                    seged[i, j] = false;
                }

                if (db == 3)
                {
                    seged[i, j] = true;
                }
            }
        }

        palya = seged;
    }
    
    static string palyaKiiratas()
    {
        string kiirando = "";
        for (int i = 0; i < palya.GetLength(0); i++)
        {
            for (int j = 0; j < palya.GetLength(1); j++)
            {
                if (palya[i, j])
                {
                    kiirando += "O";
                }
                else
                {
                    kiirando += " ";
                }
                
            }
            kiirando += "\n";
        }
        return kiirando;
    }
    static void Main(string[] args)
    {
        ConsoleKey gomb = ConsoleKey.Enter;
        while (gomb != ConsoleKey.X)
        {
            Console.Clear();
            Console.WriteLine(palyaKiiratas());
            UjKor();
            gomb = Console.ReadKey().Key;
        }

        Console.ReadKey();
    }
}