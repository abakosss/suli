// See https://aka.ms/new-console-template for more information

        Random r = new Random();
        Class1 b1 = new Class1(0,0);
        List<Class1> li = new List<Class1>();
        
        
        
        int x1 = r.Next(0,2);
        int y1 = r.Next(0,2);
        //Console.WriteLine("X1: " + b1.x + " " + "Y1: " + b1.y);
        b1.Lep(x1,y1);
        for (int i = 0; i < 3; i++)
        {
            li.Add(new Class1(r.Next(1,11) , r.Next(1,11)));
        }

        for (int i = 0; i < 3; i++)
        {
            Console.WriteLine("X1: " + li[i].x + " " + "Y1: " + li[i].y);
        }

        //Console.WriteLine("li2x: " + li[2].x + "li2y: " + li[2].y);

        for (int i = 0; i < 3; i++)
        {
            Console.WriteLine("Tippelj egy X koordinátát: ");
            int tippx = int.Parse(Console.ReadLine());
            Console.WriteLine("Tippelj egy Y koordinátát: ");
            int tippy = int.Parse(Console.ReadLine());
            // Console.WriteLine("tippx: " + tippx);
            // Console.WriteLine("tippy: " + tippy);
            if (li.Any(item => item.x == tippx))
            {
                Console.WriteLine("Eltaláltad az X koordinátát!");
                li.RemoveAll(item => item.x == tippx);
            }
            if (li.Any(item => item.y == tippy))
            {
                Console.WriteLine("Eltaláltad az Y koordinátát!");
                li.RemoveAll(item => item.y == tippy);
            }
        }

class Class1 {
    public int x;
    public int y;

    public Class1(int xx, int yy){
        x = xx;
        y = yy;
    }

    public void Lep(int xlep, int ylep){
        
        x = xlep;
        y = ylep;
        if (x < 5)
        {
            x += xlep;
        }
        if (y < 5)
        {
            y += ylep;
        }

        if (x==5 && y == 5)
        {
            Console.WriteLine("A bölény elérte a célt.");
        }
    }
}