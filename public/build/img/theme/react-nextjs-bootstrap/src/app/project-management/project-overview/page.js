"use client";
 
import { Row, Col, Breadcrumb } from "react-bootstrap"; 
import ProductDevelopment from '@/components/ProjectManagement/ProjectOverview/ProductDevelopment';
import RecentActivity from '@/components/ProjectManagement/ProjectOverview/RecentActivity';
import ProjectsRoadmap from '@/components/ProjectManagement/ProjectOverview/ProjectsRoadmap';
import ProjectsOverview from '@/components/ProjectManagement/ProjectOverview/ProjectsOverview';
import TeamMembers from '@/components/ProjectManagement/ProjectOverview/TeamMembers';
import ToDoList from '@/components/ProjectManagement/ProjectOverview/ToDoList';
import TasksOverview from '@/components/ProjectManagement/ProjectOverview/TasksOverview';

export default function Page() {
  return (
    <>
      <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <h3 className="mb-0">Project Overview</h3>
 
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
            <span className="fw-medium">Project Overview</span>
          </Breadcrumb.Item>
        </Breadcrumb>
      </div>

      <Row>
        <Col md={12} lg={12} xl={6}>
          <ProductDevelopment />

          <RecentActivity />
        </Col>

        <Col md={12} lg={12} xl={6}>
          <ProjectsRoadmap />

          <ProjectsOverview />

          <TeamMembers />
        </Col>
      </Row>

      <Row>
        <Col md={12} lg={12} xl={8}>
          <ToDoList />
        </Col>

        <Col md={12} lg={12} xl={4}>
          <TasksOverview />
        </Col>
      </Row>
    </>
  );
}
