"use client";

import DebitCard from "@/components/Finance/Wallet/DebitCard";
import Static from "@/components/Finance/Wallet/Static";
import TotalExpenses from "@/components/Finance/Wallet/TotalExpenses";
import TotalIncome from "@/components/Finance/Wallet/TotalIncome";
import TransactionHistory from "@/components/Finance/Wallet/TransactionHistory";
import { Row, Col, Breadcrumb } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Wallet</h3>

        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item href="#">
            <span className="text-secondary fw-medium hover">Finance</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Wallet</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col lg={4}>
          <Row>
            <Col sm={12} md={4} lg={12}>
              <div style={{ marginBottom: "60px" }}>
                <span className="d-block mb-1">Accounts Receivable</span>
                <h4 className="fs-20 mb-0">$15,990</h4>
              </div>
            </Col>

            <Col sm={6} md={4} lg={12}>
              <TotalIncome />
            </Col>

            <Col sm={6} md={4} lg={12}>
              <TotalExpenses />
            </Col>
          </Row>
        </Col>

        <Col lg={8}>
          <Static />
        </Col>
      </Row>

      <Row>
        <Col xxl={8}>
          <TransactionHistory />
        </Col>

        <Col xxl={4}>
          <DebitCard />
        </Col>
      </Row>
    </>
  );
}
