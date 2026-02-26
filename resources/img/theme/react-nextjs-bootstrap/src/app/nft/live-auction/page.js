"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import DownloadApp from "@/components/NFT/LiveAuction/DownloadApp";
import HistoryOfBids from "@/components/NFT/LiveAuction/HistoryOfBids";
import LiveAuction from "@/components/NFT/LiveAuction";

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Live Auction</h3>

        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
          <Breadcrumb.Item>
            <span className="fw-medium">NFT</span>
          </Breadcrumb.Item>
          <Breadcrumb.Item active>
            <span className="fw-medium">Live Auction</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xs={12} sm={12} lg={8} xl={8} xxl={9}>
          <LiveAuction />
        </Col>

        <Col xs={12} sm={12} lg={4} xl={4} xxl={3}>
          <DownloadApp />

          <HistoryOfBids />
        </Col>
      </Row>
    </>
  );
}
