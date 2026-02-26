"use client";

import React, { useState } from "react";
import { Card } from "react-bootstrap";

const RatingWithHeartIcon = () => {
  const [rating, setRating] = useState(0);

  const handleClick = (index) => {
    setRating(index + 1);
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-4">
            <h3 className="mb-0">Rating With Start Icon</h3>
          </div>

          <div className="ratings" dir="ltr" style={{ display: "flex" }}>
            {[...Array(5)].map((_, index) => (
              <span
                key={index}
                className={`rating ${index < rating ? "active" : ""}`}
                onClick={() => handleClick(index)}
                style={{
                  cursor: "pointer",
                  fontSize: "24px",
                  color: index < rating ? "#f39c12" : "gray",
                  marginLeft: index !== 0 ? "8px" : "0",
                }}
              >
                <i className="ri-heart-fill"></i>
              </span>
            ))}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RatingWithHeartIcon;
