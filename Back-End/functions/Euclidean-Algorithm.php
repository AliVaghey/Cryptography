<?php 

/**
 * Greatest Commen Divisor
 * 
 * @param int $a
 * @param int $b
 * 
 * @return int
 */
function GCD(int $a, int $b)
{
    $r = $a % $b;
    if ($r)
        return GCD($b, $r);
    else
        return $b;
}

/**
 * Greatest Commen Divisor (algorithm of the text book)
 * Extended Euclidean Algorithm :
 * 
 * au + bv = gcd(a,b)
 * 
 * 1. Set u = 1, g = a, x = 0, and y = b
 * 2. If y = 0, set v = (g − au)/b and return the values (g, u, v)
 * 3. Divide g by y with remainder, g = qy + t, with 0 ≤ t<y
 * 4. Set s = u − qx
 * 5. Set u = x and g = y
 * 6. Set x = s and y = t
 * 7. Go To Step (2)
 * 
 * @param int $a
 * @param int $b
 * @param int $g = a
 * @param int $y = b
 * @param int $u
 * @param int $x
 * @return array contains : (gcd, u, v)
 */
function eucli_algo(int $a, int $b, int $g, int $y, int $u = 1, int $x = 0): array
{
    if ($y == 0 || $b == 0) {
        $result['gcd'] = $g;
        $result['u'] = $u;
        $result['v'] = $b ? ($g - $a * $u) / $b : 0;
        return $result;
    }
    $t = $g % $y;
    $q =  floor($g / $y);
    $s = $u - $q * $x;
    return eucli_algo($a, $b, $y, $t, $x, $s);
}



// while (true) {
//     echo "\na = ";
//     $a = readline();
//     echo "b = ";
//     $b = readline();
//     echo "gcd = ";
//     print_r(eucli_algo($a, $b, $a, $b));
//     echo "\n=======================\n";
// }