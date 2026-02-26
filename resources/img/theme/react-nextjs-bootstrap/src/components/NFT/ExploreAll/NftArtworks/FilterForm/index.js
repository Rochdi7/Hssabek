"use client";

import { useState } from "react";
import { Row, Col, Button, Form, Card } from "react-bootstrap";

const FilterForm = () => {
  // State for price range, assuming a min of 0 and max of 100 for now
  const [priceRange, setPriceRange] = useState([0, 100]);

  const handlePriceChange = (event) => {
    setPriceRange([0, parseInt(event.target.value)]);
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4 pb-0">
        <Form>
          <Row>
            <Col lg={3}>
              <div className="position-relative mb-4">
                <Form.Control
                  type="text"
                  className="bg-body-bg border-0"
                  placeholder="Search here..."
                />
                <Button
                  type="submit"
                  className="position-absolute top-50 end-0 translate-middle-y bg-transparent p-0 border-0 pe-3 pt-2 text-primary"
                >
                  <span className="material-symbols-outlined">search</span>
                </Button>
              </div>
            </Col>

            <Col lg={3}>
              <Form.Group className="mb-4">
                <Form.Select
                  className="form-control bg-body-bg border-0"
                  aria-label="Default select example"
                >
                  <option value="0">Category</option>
                  <option value="1">NFT</option>
                  <option value="2">Bird</option>
                  <option value="3">Pool</option>
                </Form.Select>
              </Form.Group>
            </Col>

            <Col lg={3}>
              <Form.Group className="mb-4">
                <Form.Select
                  className="form-control bg-body-bg border-0"
                  aria-label="Default select example"
                >
                  <option value="0">File Type</option>
                  <option value="1">Full File</option>
                  <option value="2">Zip FIle</option>
                  <option value="3">Only Card</option>
                </Form.Select>
              </Form.Group>
            </Col>

            <Col lg={3}>
              <Form.Group className="mb-4">
                <Form.Select
                  className="form-control bg-body-bg border-0"
                  aria-label="Default select example"
                >
                  <option value="0">Sales Type</option>
                  <option value="1">Full File</option>
                  <option value="2">Zip FIle</option>
                  <option value="3">Only Card</option>
                </Form.Select>
              </Form.Group>
            </Col>

            <Col lg={8}>
              <Form.Group className="mb-4">
                <div className="d-flex align-items-center gap-3">
                  <div className="flex-shrink-0">
                    <span className="fs-14 fw-semibold">Price:</span>
                  </div>
                  <Form.Range
                    min={0}
                    max={100}
                    value={priceRange[1]}
                    onChange={handlePriceChange}
                  />
                  <span>${priceRange[0]}</span> {/* Min price display */}
                  <span>-</span>
                  <span>${priceRange[1]}</span>{" "}
                  {/* Dynamic max price display */}
                </div>
              </Form.Group>
            </Col>

            <Col lg={4}>
              <Form.Group className="mb-4 text-end">
                <Button className="btn btn-primary py-2 px-5">Filter</Button>
              </Form.Group>
            </Col>
          </Row>
        </Form>
      </Card>
    </>
  );
};

export default FilterForm;
