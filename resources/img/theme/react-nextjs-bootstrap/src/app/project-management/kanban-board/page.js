"use client";

import { Row, Col, Breadcrumb } from "react-bootstrap";
import ToDo from '@/components/ProjectManagement/KanbanBoard/ToDo';
import Doing from '@/components/ProjectManagement/KanbanBoard/Doing';
import Done from '@/components/ProjectManagement/KanbanBoard/Done';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Kanban Board</h3>
 
        <Breadcrumb className="breadcrumb-page-list align-items-center mb-0 lh-1">
          <Breadcrumb.Item href="/dashboard/ecommerce/">
            <div className="d-flex align-items-center text-decoration-none">
              <i className="ri-home-4-line fs-18 text-primary me-1"></i>
              <span className="text-secondary fw-medium hover">Dashboard</span>
            </div>
          </Breadcrumb.Item>

          <Breadcrumb.Item>
            <span className="fw-medium">Project Management</span>
          </Breadcrumb.Item>

          <Breadcrumb.Item active>
            <span className="fw-medium">Kanban Board</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col xs={12} sm={6} lg={4}>
          <ToDo />
        </Col>

        <Col xs={12} sm={6} lg={4}>
          <Doing />
        </Col>

        <Col xs={12} sm={6} lg={4}>
          <Done />
        </Col> 
      </Row>
    </>
  );
}
