/**
 * 有一个整形数组，求其连续和最大值的字串，时间复杂度是O(n)
 * 如果元素全部为正数或者负数则没有意义。
 * 一般实现此算法有三种复杂度
 * O(n^3),O(nlgn),O(n).下面我们实现时间复杂度为O(n)的方式
 * 《算法导论》中有详细的O(nlgn)算法说明
 * 《编程珠玑》第二版有O(n)的算法说明  p75算法4
 *
 * @author Administrator
 */
public class MaxArrayDemo
{
    public static void main(String[] args)
    {
        int[] array = {31, -41, 59, 26, -53, 58, 97, -93, 210, 84};
        getMaxArray(array);
    }

    private static void getMaxArray(int[] array)
    {
        if (array == null || array.length == 0)
        {
            System.out.println("数组不存在或者数组中无元素");
            return;
        }
        int start = 0, end = 0;
        int currentSum = 0, maxSum = Integer.MIN_VALUE;
        for (int i = 0, len = array.length; i < len; i++)
        {
            if (currentSum < 0)
            {
                currentSum = array[i];
                start = i;
            } else
            {
                currentSum += array[i];
            }

            if (currentSum > maxSum)
            {
                maxSum = currentSum;
                end = i;
            }
        }
        System.out.println("最大的子序列是从" + start + "到" + end);
        System.out.println("最大的子序列的和是" + maxSum);
    }
}