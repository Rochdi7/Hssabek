"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import Sidebar from '@/components/Apps/FileManager/Sidebar';
import MyDrive from '@/components/Apps/FileManager/MyDrive';
import RecentFiles from '@/components/Apps/FileManager/RecentFiles';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">File Manager</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>
          <Breadcrumb.Item>
            <span className="fw-medium">Apps</span>
          </Breadcrumb.Item>
          <Breadcrumb.Item active>
            <span className="fw-medium">File Manager</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xs={12} md={4} lg={3} xl={3}>
          <Sidebar />
        </Col>

        <Col xs={12} md={8} lg={9} xl={9}>
          <MyDrive />

          <RecentFiles />
        </Col> 
      </Row>
    </>
  );
}
