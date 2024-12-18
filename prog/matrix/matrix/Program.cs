﻿namespace matrix;

class Program
{
    static void Main(string[] args)
    {
        int[,] matrix1 = Matrix1();
        int[,] matrix2 = Matrix2();
        int[,] matrix3 = Matrix3();
        Console.WriteLine("Matrix 1:");
        MatrixKiiratas(matrix1);
        Console.WriteLine("Matrix 2:");
        MatrixKiiratas(matrix2);
        Console.WriteLine("Matrix 3:");
        MatrixKiiratas(matrix3);
    }

    static void MatrixKiiratas(int[,] matrix)
    {
        for (int i = 0; i < matrix.GetLength(0); i++)
        {
            for (int j = 0; j < matrix.GetLength(1); j++)
            {
                Console.Write(matrix[i, j]);
            }
            Console.WriteLine();
        }
    }
    
    static int[,] Matrix1()
    {
        int[,] matrix1 = new int[10, 10];

        for (int i = 0; i < matrix1.GetLength(0); i++)
        {
            matrix1[i, i] = 1;
        }

        return matrix1;
    }
    static int[,] Matrix2()
    {
        //sor, oszlop
        int[,] matrix2 = new int[10, 10];
    
        for (int i = 0; i < matrix2.GetLength(0); i++)
        {
            matrix2[i, matrix2.GetLength(1) - i - 1] = 1;
        }

        return matrix2;
    }
    
    static int[,] Matrix3()
    {
        //sor, oszlop
        int[,] matrix3 = new int[10, 10];
    
        for (int i = 0; i < matrix3.GetLength(0); i++)
        {
            matrix3[i, i] = 1;
            matrix3[i, matrix3.GetLength(1) - i - 1] = 1;
        }

        return matrix3;
    }
}