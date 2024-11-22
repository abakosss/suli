namespace Viktorkedd;

class Program
{
    static void Main(string[] args)
    {
        Console.WriteLine("Hello, World!");
    }

    static void Shot(bool[,] game, int i, int j)
    {
        game[i, j] = !game[i, j];

        if (i-1 >= 0)
        {
            game[i - 1, j] = !game[i - 1, j];
        }

        if (i + 1 < game.GetLength(0)-1)
        {
            game[i + ]
        }
    }
}