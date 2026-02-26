"use client";

import React, { useState } from 'react';
import { Form, Button } from "react-bootstrap";

function ProductQuantity() {
  const [count, setCount] = useState(1); // Initial count

  const handleIncrease = () => {
    setCount(prevCount => prevCount + 1);
  };

  const handleDecrease = () => {
    setCount(prevCount => (prevCount > 1 ? prevCount - 1 : 1)); // Prevent count from going below 1
  };

  return (
    <div className="product-quantity">
      <div className="add-to-cart-counter d-flex align-items-center">
        <Button className="minusBtn" onClick={handleDecrease}>
          -
        </Button>
        <Form.Control
          type="text"
          size="sm"
          value={count}
          readOnly
          className="text-center count"
        />
        <Button className="plusBtn" onClick={handleIncrease}>
          +
        </Button>
      </div>
    </div>
  );
}

export default ProductQuantity;
