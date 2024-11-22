namespace sejtek;

class Program
{
    static bool[,] palya = new bool[5,5]
    {
        { false, false, false, false, false},
        { false, true, false, false, false},
        { true, true, true, false, false},
        { false, false, false, false, false},
        { false, false, false, false, false},
    };

    static int SzomszedokSzama(int i, int j)
    {
        int db = 0;

        if (i + 1 < palya.GetLength(0) && palya[i+1, j])
        {
            db++;
        }
        if (i < 0 && palya[i - 1, j])
        {
            db++;
        }
        if (j + 1 < palya.GetLength(1) && palya[i, j+1])
        {
            db++;
        }
        if (j < 0 && palya[i, j - 1] )
        {
            db++;
        }
        if (i + 1 < palya.GetLength(0) && j + 1 < palya.GetLength(1) && palya[i + 1, j + 1])
        {
            db++;
        }
        if (i + 1 < palya.GetLength(0) && j < 0 && palya[i + 1, j - 1])
        {
            db++;
        }
        if (i < 0 && j+1 < palya.GetLength(1) && palya[i - 1, j + 1])
        {
            db++;
        }
        if (i < 0 && j <= 0 && palya[i - 1, j - 1])
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
                if (db > 2)
                {
                    seged[i, j] = true;
                }
                else if (db < 2 || db > 3)
                {
                    seged[i, j] = false;
                }
                else if (db == 3)
                {
                    seged[i, j] = true;
                }
            }
        }
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
        while (gomb != ConsoleKey.Escape)
        {
            Console.Clear();
            UjKor();
            Console.WriteLine(palyaKiiratas());
            gomb = Console.ReadKey().Key;
        }
        
    }
}