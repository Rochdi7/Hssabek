"use client";

import { Row, Col, Button } from "react-bootstrap";
import Image from "next/image";
import TotalSales from "./TotalSales";
import TotalOrders from "./TotalOrders";
import TotalProfit from "./TotalProfit";
import TotalRevenue from "./TotalRevenue";
import DateTimePickerDemo from "./DateTimePickerDemo";

const Stats = () => {
  return (
    <>
      <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <h3 className="fs-24 fw-normal mb-0">
          Welcome Back, <span className="text-primary">Olivia!</span>{" "}
          <Image src="/images/dog.svg" alt="dog" width={32} height={32} />
        </h3>

        <div className="d-flex flex-wrap gap-3 align-items-center">
          <DateTimePickerDemo />

          <Button type="button" className="btn btn-primary py-1 px-3 rounded-3">
            <span className="d-inline-block py-1">
              <i className="ri-download-2-line text-white fs-16 me-1"></i>
              Export CSV
            </span>
          </Button>
        </div>
      </div>

      <Row>
        <Col sm={6} xl={3}>
          <TotalSales />
        </Col>

        <Col sm={6} xl={3}>
          <TotalOrders />
        </Col>

        <Col sm={6} xl={3}>
          <TotalProfit />
        </Col>

        <Col sm={6} xl={3}>
          <TotalRevenue />
        </Col>
      </Row>
    </>
  );
};

export default Stats;
