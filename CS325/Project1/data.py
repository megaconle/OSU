data = [
        [1, 4, -9, 8, 1, 3, 3, 1, -1, -4, -6, 2, 8, 19, -10, -11 ],
        [2, 9, 8, 6, 5, -11, 9, -11, 7, 5, -1, -8, -3, 7 -2],
        [10, -11, -1, -9, 33,-45, 23, 24, -1, -7 -8, 19],
        [31,-41, 59, 26, -53, 58, 97, -93, -23, 84],
        [3, 2, 1, 1,-8, 1,1,2, 3],
        [12, 99, 99, -99, -27, 0, 0, 0, -3,10],
        [-2, 1,-3, 4, -1, 2, 1,-5, 4],
        [-1, -3, -5]
]

answers = [34,30,50,187,7,210,6,0]

def get_with_answers():
    return data, answers

def get_data(n):
    result = []
    for i in range(0,n):
        result.append(data[i % len(data)])
    return result