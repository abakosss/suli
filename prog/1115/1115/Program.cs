using System.Reflection.Metadata.Ecma335;
using System.Threading.Channels;

namespace _1115;

class Program
{
    static void Main(string[] args)
    {
        bool[,] game = new bool[5, 5];
        
        init(game);
        Console.WriteLine(state(game));
    }

    static void init(bool[,] game)
    {
        for (int i = 0; i < game.GetLength(0); i++)
        {
            for (int j = 0; j < game.GetLength(1); j++)
            {
                game[i, j] = false;
            }
        }

        game[2, 2] = true; // középső
        game[1, 2] = true; // középső feletti
        game[2, 3] = true; // középső jobb
        game[3, 2] = true; // középső alatti
        game[2, 1] = true; // középső bal
    }

    
    static string state(bool[,] game)
    {
        string allapot = "";
        for (int i = 0; i < game.GetLength(0); i++)
        {
            for (int j = 0; j < game.GetLength(1); j++)
            {
                if (game[i, j])
                {
                    allapot += "*";
                }
                else
                {
                    allapot += "-";
                }
            }
            allapot += "\n";
        }
        return allapot;
    }
}