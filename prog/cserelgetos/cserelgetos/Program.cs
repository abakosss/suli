namespace cserelgetos;

class Program
{
    static void Main(string[] args)
    {
        int n = 5; //játék mérete 
        bool[,] game = new bool[n, n];

        init(game);

        while (!isOver(game))
        {
            Console.WriteLine(state(game));

            Console.WriteLine("Add meg a koordinátákat (x és y, 0 és " + (n - 1) + " között):");
            int x = int.Parse(Console.ReadLine());
            int y = int.Parse(Console.ReadLine());

            shoot(game, x, y);
        }

        Console.WriteLine("Nyertél!");
    }

    static void init(bool[,] game)
    {
        int n = game.GetLength(0);
        for (int i = 0; i < n; i++)
        {
            for (int j = 0; j < n; j++)
            {
                game[i, j] = false;
            }
        }
        int kozepsoMezo = n / 2;
        game[kozepsoMezo, kozepsoMezo] = true;
        
        if (kozepsoMezo - 1 >= 0) game[kozepsoMezo - 1, kozepsoMezo] = true;
        if (kozepsoMezo + 1 < n) game[kozepsoMezo + 1, kozepsoMezo] = true;
        if (kozepsoMezo - 1 >= 0) game[kozepsoMezo, kozepsoMezo - 1] = true;
        if (kozepsoMezo + 1 < n) game[kozepsoMezo, kozepsoMezo + 1] = true;
    }
    
    static string state(bool[,] game)
    {
        int n = game.GetLength(0);
        string result = "";
        for (int i = 0; i < n; i++)
        {
            for (int j = 0; j < n; j++)
            {
                if (game[i, j])
                {
                    result += "*";
                }
                else
                {
                    result += "-";
                }
            }
            result += "\n";
        }
        return result;
    }
    
    static void shoot(bool[,] game, int x, int y)
    {
        int n = game.GetLength(0);
        
        game[x, y] = !game[x, y];
        
        if (x - 1 >= 0) game[x - 1, y] = !game[x - 1, y];
        if (x + 1 < n) game[x + 1, y] = !game[x + 1, y];
        if (y - 1 >= 0) game[x, y - 1] = !game[x, y - 1];
        if (y + 1 < n) game[x, y + 1] = !game[x, y + 1];
    }
    
    static bool isOver(bool[,] game)
    {
        int n = game.GetLength(0);
        for (int i = 0; i < n; i++)
        {
            for (int j = 0; j < n; j++)
            {
                if (!game[i, j])
                {
                    return false;
                }
            }
        }
        return true;
    }
}