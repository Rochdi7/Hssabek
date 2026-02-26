"use client";

import React from "react";
import Link from "next/link";
import { Row, Col, Card, Dropdown } from "react-bootstrap";

const topSellingItems = [
  {
    id: 1,
    name: "Thai Bean Soup",
    image: "/images/top-item-1.jpg",
    rating: 5.0,
    sold: 1235,
    link: "/restaurant/dish-details",
  },
  {
    id: 2,
    name: "Meat Lasagna",
    image: "/images/top-item-2.jpg",
    rating: 4.8,
    sold: 1045,
    link: "/restaurant/dish-details",
  },
  {
    id: 3,
    name: "Veg Sandwich",
    image: "/images/top-item-3.jpg",
    rating: 4.9,
    sold: 1015,
    link: "/restaurant/dish-details",
  },
  {
    id: 4,
    name: "Creamy Fish",
    image: "/images/top-item-4.jpg",
    rating: 4.8,
    sold: 996,
    link: "/restaurant/dish-details",
  },
];

const TopSellingItems = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0 text-secondary-50">Top Selling Item</h3>

            <Dropdown className="dropdown select-dropdown">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="dropdown-toggle bg-border-color border text-body rounded-2"
              >
                Weekly
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Weekly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Monthly
                </Dropdown.Item>

                <Dropdown.Item href="#" className="text-secondary py-2 px-3">
                  Yearly
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <Row>
            {topSellingItems.slice(0, 4).map((item) => (
              <Col key={item.id} sm={6} md={3}>
                <Link
                  href={item.link}
                  className="text-decoration-none d-block"
                  style={{ marginTop: "22px" }}
                >
                  <div className="position-relative mb-2 pb-1">
                    <div
                      className="bg-img"
                      style={{
                        backgroundImage: `url(${item.image})`,
                        height: "145px",
                        borderRadius: "10px",
                      }}
                    ></div>
                    <div
                      className="d-inline-block position-absolute top-0 end-0"
                      style={{
                        padding: "3px",
                      }}
                    >
                      <div
                        className="d-flex align-items-center bg-dark rounded-pill"
                        style={{
                          gap: "2px",
                          padding: "1.5px 5px",
                        }}
                      >
                        <i className="ri-star-fill fs-14 text-danger"></i>
                        <span
                          className="fs-12 fw-semibold"
                          style={{
                            color: "#FFF5ED",
                          }}
                        >
                          {item.rating}
                        </span>
                      </div>
                    </div>
                  </div>
                  <h4 className="fs-14 fw-semibold mb-0 text-secondary-50">
                    {item.name}
                  </h4>
                  <span className="fs-12 fw-medium text-body">
                    {item.sold} sold
                  </span>
                </Link>
              </Col>
            ))}
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default TopSellingItems;
