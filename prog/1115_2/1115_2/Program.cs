namespace _1115_2;

class Program
{
    static void Main(string[] args)
    {
        Console.WriteLine("A játék elindult!");
        bool[,] negyzetracs = new bool[5, 20];
        elettermatrix(negyzetracs);
        elettermatrixkiiratas(negyzetracs);
        elettermatrixujallapot(negyzetracs);
    }

    static void elettermatrix(bool[,] negyzetracs)
    {
        for (int i = 0; i < negyzetracs.GetLength(0); i++)
        {
            for (int j = 0; j < negyzetracs.GetLength(1); j++)
            {
                Random rnd = new Random();
                int elosejt = rnd.Next(0,10);
                if (elosejt == 5)
                {
                    negyzetracs[i,j] = true;
                }
                else
                {
                    negyzetracs[i,j] = false;
                }
            }
        }
    }

    static void elettermatrixkiiratas(bool[,] negyzetracs)
    {
        for (int i = 0; i < negyzetracs.GetLength(0); i++)
        {
            for (int j = 0; j < negyzetracs.GetLength(1); j++)
            {
                if (negyzetracs[i,j])
                {
                    Console.Write("#");
                }
                else
                {
                    Console.Write(".");
                }
            }
            Console.WriteLine("\n");
        }
    }

    static void elettermatrixujallapot(bool[,] negyzetracs)
    {
        for (int i = 0; i < negyzetracs.GetLength(0); i++)
        {
            for (int j = 0; j < negyzetracs.GetLength(1); j++)
            {
                if (negyzetracs[i,j])
                {
                    
                }
            }
        }
    }
}