{
 "cells": [
  {
   "cell_type": "code",
   "execution_count": null,
   "id": "6df8a789",
   "metadata": {},
   "outputs": [
    {
     "name": "stdout",
     "output_type": "stream",
     "text": [
      "press 1  -to buy\n",
      " press 2 -to remove from cart\n",
      " press 3 -to clear cart\n",
      " press 4 -Bill\n",
      " press 5 -EXIT\n",
      "1\n",
      "enter the product name to buy  p4\n",
      "enter the quantity 2\n",
      "press 1  -to buy\n",
      " press 2 -to remove from cart\n",
      " press 3 -to clear cart\n",
      " press 4 -Bill\n",
      " press 5 -EXIT\n",
      "4\n",
      "800\n",
      "{'p4': 2}\n",
      "press 1  -to buy\n",
      " press 2 -to remove from cart\n",
      " press 3 -to clear cart\n",
      " press 4 -Bill\n",
      " press 5 -EXIT\n",
      "3\n",
      "press 1  -to buy\n",
      " press 2 -to remove from cart\n",
      " press 3 -to clear cart\n",
      " press 4 -Bill\n",
      " press 5 -EXIT\n",
      "4\n",
      "0\n",
      "{}\n"
     ]
    }
   ],
   "source": [
    "product={'p1':100,'p2':200,'p3':300,'p4':400}\n",
    "product_cart={}\n",
    "total=0\n",
    "while True:\n",
    "    \n",
    "    choice=int(input(\"press 1  -to buy\\n press 2 -to remove from cart\\n press 3 -to clear cart\\n press 4 -Bill\\n press 5 -EXIT\\n\"))\n",
    "    if choice==1:\n",
    "        p=input(\"enter the product name to buy  \")\n",
    "        if p in product:\n",
    "            q=int(input(\"enter the quantity \"))\n",
    "            total=total+(product[p]*q)\n",
    "            product_cart[p]=q\n",
    "            \n",
    "        else:\n",
    "            print(\"we do not have suct product\")\n",
    "    elif choice==2:\n",
    "        p=input(\"enter the product name to remove  \")\n",
    "        if p in product_cart:\n",
    "            total=total-(product[p]*product_cart[p])\n",
    "            del product_cart[p]\n",
    "            print(total)\n",
    "        else:\n",
    "            print(\"product not in a cart\")\n",
    "    elif choice==3:\n",
    "        product_cart.clear()\n",
    "        total=0\n",
    "    elif choice==4:\n",
    "        print(total)\n",
    "        print(product_cart)\n",
    "    elif choice==5:\n",
    "        break\n",
    "    else:\n",
    "        print(\"invalid choice\")\n",
    "    \n",
    "    \n",
    "\n",
    "    "
   ]
  },
  {
   "cell_type": "code",
   "execution_count": null,
   "id": "3bd65d8d",
   "metadata": {},
   "outputs": [],
   "source": []
  }
 ],
 "metadata": {
  "kernelspec": {
   "display_name": "Python 3",
   "language": "python",
   "name": "python3"
  },
  "language_info": {
   "codemirror_mode": {
    "name": "ipython",
    "version": 3
   },
   "file_extension": ".py",
   "mimetype": "text/x-python",
   "name": "python",
   "nbconvert_exporter": "python",
   "pygments_lexer": "ipython3",
   "version": "3.8.8"
  }
 },
 "nbformat": 4,
 "nbformat_minor": 5
}
